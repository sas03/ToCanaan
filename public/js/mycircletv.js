var vynch = (function() {
	
	function dateHMS(time) {
		if ( time == 0 ) return '';
		var addZero = function(v) { return v<10 ? '0' + v : v; };
		var t = [];
		var m = Math.floor(time/60);
		var h = Math.floor(m/60);
		if ( h > 0 ) {
			t.push(h);
			m = m%60;
		}
		t.push(addZero(m));
		t.push(addZero(Math.floor(time%60)));
		return t.join(':');
	}

	function getRoomsList(callback)
	{
		var req = new XMLHttpRequest();
		req.open('GET', 'https://www.mycircle.tv/srv/userooms.php?id=193-36218-86', true);
		req.withCredentials = true;
		req.onreadystatechange = function (aEvt) {
			  if (req.readyState == 4) {
				 if(req.status == 200) {
					try {
						var res = JSON.parse(req.responseText);
						vynch.rooms = res;
						callback(res);
					} catch(ex) {
						callback(null);
					}
				 } else callback(null);
			  }
		};
		req.send(null);
	}
	
	function setNick(nick)
	{
		var req = new XMLHttpRequest();
		req.open('GET', 'https://www.mycircle.tv/srv/setnick.php?nick=' + encodeURIComponent(nick), true);
		req.withCredentials = true;
		req.send(null);
	}
	
	function setRoomsList()
	{
		getRoomsList(function(res) {
			if ( res ) innerSetRoomsList();
		});
	}
	
	function innerSetRoomsList()
	{
		var cssId = 'vynch_style';
		if (!document.getElementById(cssId)) {
			var head  = document.getElementsByTagName('head')[0];
			var link  = document.createElement('link');
			link.id  = cssId;
			link.rel  = 'stylesheet';
			link.type = 'text/css';
			//link.href = 'https://www.mycircle.tv/Skins/vynch/rlist.css';
			link.href = './../css/mycircletv.css';
			link.media = 'all';
			head.appendChild(link);
		}
		var txt = '<table style="border-collapse:separate;border-spacing:20px;">';
		for ( var ir = 0 ; ir < vynch.rooms.length ; ir++ ) {
			if ( ir == 0 ) txt += '<tr>';
			else if ( ir % 4 == 0 ) txt += '</tr><tr>';
			var room = vynch.rooms[ir];
			
			txt += '<td valign="top" class="vynch_hist_entry">' +
			'<div title="' + room.libelle + '" class="vynch_title_histo">' + room.libelle + '</div><br>' +
			'<div style="position:relative; padding-bottom:8px;"><img width="185px" src="' + room.thumbnail + '"><div class="vynch_duration">' + dateHMS(room.video_duration) + '</div></div>' +
			'<ul class="vynch_ul"><li class="vynch_title">' + room.title + "</li>" +
			'<li class="vynch_src">' + room.video_src + 
			(room.protection == 0 ? '': '&nbsp;<img src="/Skins/01b//v_' + (room.protection == 1 ? 'open':'protect') + '.png">') + '</li>' +
			(room.pl_size == 0 ? '': '<li>' + room.pl_size + '&nbsp;vidÃ©os dans la playlist</li>') +
			(room.users == 0 ? '': '<li class="vynch_users">' + room.users + '&nbsp;Participants</li>') +
			'</ul><div style="visibility:hidden;padding-bottom:5px;">&nbsp;</div><div class="vynch_incit">' +
			'<a href="javascript:vynch.openRoom(\'' + room.id + '\')">_fr_vynch_open_room</a></div>' +
			'</td>';
		}
		txt += '</tr></table>';				
		document.getElementById('vynch_rooms').innerHTML = txt;
	}
	function openRoom(rid)
	{
		var vynch_div = document.getElementById('vynch_div');
		if ( vynch_div ) {
			vynch_div.innerHTML = '<iframe id="vynch_frame" style="width:' + 800 + 'px;height:' + 580 + 
				'px;border-width:1px;border-style:solid;border-color:#EEEEEE;background-color:red" src="https://www.mycircle.tv/srv/frame.php?r=' + 
				rid + '&tabs=yes"></iframe>';
				//https://www.mycircle.tv/srv/frame.php?r=8903-9747-41
		} else window.location = vynch.base_url + '#' + rid;
	}
	
	function init()
	{
		if ( document.getElementById('vynch_rooms') ) setRoomsList();
		if ( document.getElementById('vynch_div') ) {
			var rid = window.location.hash.substring(1);
			if ( rid ) openRoom(rid);
		}
	}
	
	function onMessage(event)
	{
		if ( event.origin == 'https://www.mycircle.tv' ) {
		  //console.log("Vynch onMessage : " + event.data);
		  var data, vevent;
			try {
				data = JSON.parse(event.data);
				vevent = data.event;
				console.log("Vynch onMessage event: " + vevent);
				if ( typeof vynch.listeners[vevent] == 'function' ) vynch.listeners[vevent](vevent,data);
			}
			catch(e)  {
				//fail silently... like a ninja!
			}
		}
	}

	function addEvent (elem, type, eventHandle) { 
		if (elem == null || elem == undefined) return; 
		if ( elem.addEventListener ) { 
			elem.addEventListener( type, eventHandle, false ); 
		} else if ( elem.attachEvent ) { 
			elem.attachEvent( "on" + type, eventHandle ); 
		} 
	}
	
	addEvent(window, "message", onMessage);

	function register(event,callback)
	{
		vynch.listeners[event] = callback;
	}
	
	return {
		listeners : {},
		base_url : '',
		setRoomsList: setRoomsList,
		openRoom: openRoom,
		init: init,
		setNick: setNick,
		register: register
	}
})();
document.write('<div id="vynch_div"></div>');
vynch.openRoom('8903-9747-41');