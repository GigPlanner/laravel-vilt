module.exports = {
  tabWidth: 2,
  semi: false,
  singleQuote: true,
  trailingComma: 'es5',
  bracketSpacing: true,
  printWidth: 100,
  phpVersion: '8.1',
  overrides: [
    {
      files: '*.js',
      options: {
        parser: 'flow',
      },
    },
    {
      files: '*.php',
      options: {
        tabWidth: 4,
      },
    },
  ],
}
