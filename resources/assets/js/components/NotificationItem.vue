<template>
  <li>
    <a :href="followUrl">
      <strong>{{ unreag.data.user.prenom }} {{ unreag.data.user.nom }}</strong> vous suit !
    </a>
  </li>
</template>

<script type="module">

  export default {
      props:['unread'],
      data(){
        return {
          followUrl: ''
        }
      },
      mounted() {
        this.followUrl='social_network/profile/'+this.unread.data.follow.id
      }
  }
</script>
