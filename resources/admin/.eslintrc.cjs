/* eslint-env node */
// require("@rushstack/eslint-patch/modern-module-resolution");

module.exports = {
  env: {
    node: true,
  },
  extends: [
    'eslint:recommended',
    'plugin:vue/recommended',
    "prettier",
    "@vue/eslint-config-typescript"
  ],
  rules: {
    'vue/no-v-model-argument': 'off',
    "vue/attribute-hyphenation": "off"
  }
};
