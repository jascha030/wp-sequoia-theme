const TailwindExtractor = content => content.match(/[A-Za-z0-9-_:\/]+/g) || []

module.exports = {
  plugins: [
    require('postcss-import'),
    require('tailwindcss/nesting'),
    require('tailwindcss'),
    require('autoprefixer'),
    require('@fullhuman/postcss-purgecss')({
      content: [
        './**/*.html',
        './**/*.php',
        './**/*.twig'
      ],
      whitelist: ['html', 'body'],
      extractors: [
        {
          extractor: TailwindExtractor,
          extensions: ['css', 'html', 'vue', 'php', 'twig']
        }
      ]
    })
  ]
}
