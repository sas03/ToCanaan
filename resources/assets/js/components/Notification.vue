<template id="notification-template">
<li class="dropdown dropdown-notifications" id="markasread" @click="markNotificationAsRead">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
      <i class="icon ion-ios-bell"></i><span class="badge">{{ unreadNotifications.length }}</span>
    </a>

    <ul class="dropdown-menu" role="menu">
      <notification-item v-for="unread in unreadNotifications" :key="unread.id" unread="unread"></notification-item>
    </ul>
</li>
</template>

<script type="module">
  import NotificationItem from './NotificationItem.vue';

  export default {
      props:['unreads','userid'],
      components:{NotificationItem},
      data(){
        return {
          unreadNotifications: this.unreads
        }
      },
      methods:{
        markNotificationAsRead() {
          if (this.unreadNotifications.length) {
            axios.get('/markAsRead');
          }
        }
      },
      mounted() {
          console.log('Component mounted.');
          Echo.private('App.User.' + this.userid)
          .notification((notification) => {
              console.log(notification);

              let newUnreadNotifications = {data:{ follow:notification.follow, user:notification.user }}
              this.unreadNotifications.push(newUnreadNotifications);
          });
      }
  }
</script>
