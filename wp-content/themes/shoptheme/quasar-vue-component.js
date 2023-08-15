// quasar-vue-component.js
import { QBtn } from "quasar";

export default {
  components: {
    QBtn,
  },
  template: `
    <div>
      <q-btn color="primary">Quasar Button</q-btn>
      <p style="text-align: center">Quasar P</p>
      <product-list :products="products"></product-list>
    </div>
  `,
  props: {
    products: Array,
  },
};
