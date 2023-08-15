/*
    Example kicking off the UI. Obviously, adapt this to your specific needs.
    Assumes you have a <div id="q-app"></div> in your <body> above
   */
const app = Vue.createApp({
  setup() {
    return {};
  },
});

app.use(Quasar);
app.mount("#q-app");
