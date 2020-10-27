require('./bootstrap')

Vue.component('notification', require('./components/Notification.vue'));

// import Echo from 'laravel-echo'
//
// let e = new Echo({
//   broadcaster: 'socket.io',
//   host: window.location.hostname + ':6001'
// });
//
// e.private('App.User.1')
//   .notification(function (notification){
//     console.log(notification)
//   })

 // window.demo = e.private('follow.1')
 //  .listen('FollowAddedEvent', function(e) {
 //    console.log('FollowAddedEvent', e);
 //  })
 //  .listenForWhisper('test', function(e) {
 //    console.log('chuchotement', e)
 //  });
