document.addEventListener("DOMContentLoaded", function () {
  /*
          Example kicking off the UI. Obviously, adapt this to your specific needs.
          Assumes you have a <div id="q-app"></div> in your <body> above
         */
  const app = Vue.createApp({
    setup() {
      return {};
    },
  });

  app.use(Quasar, {
    config: {
      /*
                brand: {
                  // primary: '#e46262',
                  // ... or all other brand colors
                },
                notify: {...}, // default set of options for Notify Quasar plugin
                loading: {...}, // default set of options for Loading Quasar plugin
                loadingBar: { ... }, // settings for LoadingBar Quasar plugin
                // ..and many more (check Installation card on each Quasar component/directive/plugin)
                */
    },
  });
  app.mount("#q-app");
});
