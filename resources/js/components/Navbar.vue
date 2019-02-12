<template>
  <header class="mdc-top-app-bar" style="height:56px;z-index:100;">
    <div class="mdc-top-app-bar__row">
      <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
        <a
          v-if="auth"
          href="#"
          class="material-icons mdc-top-app-bar__navigation-icon menu-drawer"
        >menu</a>
        
        <img
          height="30"
          width="30"
          style="margin-left:20px;background-color: #ffffffba;border-radius: 25px;padding: 1px;"
          src="img/logo.png"
          alt="Text label"
        >
        <span class="mdc-top-app-bar__title">Centro Detector Del Cáncer</span>
      </section>
    </div>
  </header>
</template>
<script>
export default {
  data() {
    return {
      csrf: window.Laravel.csrf_token,
      auth: window.auth
    };
  }
};
</script>


