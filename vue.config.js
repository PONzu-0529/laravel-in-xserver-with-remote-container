const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  // pages: {
  //   index: {
  //     // entry for the page
  //     entry: 'src/main.ts',
  //     // the source template
  //     template: 'src/index.html',
  //   },
  // },
  filenameHashing: false, // disable hashes in filenames
  transpileDependencies: true
})
