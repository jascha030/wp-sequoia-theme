import TerserPlugin from 'terser-webpack-plugin'
import MiniCssExtractPlugin, { loader as _loader } from 'mini-css-extract-plugin'
import CssMinimizerPlugin from 'css-minimizer-webpack-plugin'
import * as path from 'path'
import * as process from 'process'
import * as webpack from 'webpack'

enum WebpackMode {
  Development = 'development',
  Production = 'production',
  None = 'none'
}

const production: boolean = process.env.NODE_ENV === WebpackMode.Production
const mode: WebpackMode = production
  ? WebpackMode.Production
  : WebpackMode.Development

const devtool: string = 'source-map'
const resolve: any = { extensions: ['.ts', '.js'] }

const entry: webpack.Entry = {
  main: path.resolve(__dirname, 'src/scripts/main.ts'),
  styles: [
    path.resolve(__dirname, 'src/styles/css/tailwind.css'),
    path.resolve(__dirname, 'src/styles/scss/main.scss'),
  ]
}

const output: any = {
  path: path.resolve('dist'),
  publicPath: '/wp-content/themes/sideriuscoaching/dist/',
  filename: '[name].js',
  chunkFilename: production ? '[contenthash].js' : '[id].js',
  clean: true
}

const module: webpack.ModuleOptions = {
  rules: [
    {
      test: /\.(s[ac]|c)ss$/i,
      exclude: /node_modules/,
      use: [
        _loader,
        { loader: 'css-loader', options: { importLoaders: 1 } },
        'postcss-loader',
        'sass-loader'
      ]
    }
  ]
}

const plugins: webpack.WebpackPluginInstance[] = [
  new MiniCssExtractPlugin({ filename: '[name].css' })
]

const optimization = {
  minimize: production,
  minimizer: [
    (compiler: webpack.Compiler) => {
      const terserOptions: TerserPlugin.TerserPluginOptions = {
        parallel: true,
        test: /\.js(\?.*)?$/i,
        include: /\/dist/,
        terserOptions: { compress: { drop_console: true } },
        extractComments: true
      }
      new TerserPlugin(terserOptions).apply(compiler)
    },
    new CssMinimizerPlugin(
      { minimizerOptions: { preset: ['default', { discardComments: { removeAll: true } }] } }
    )
  ],
  runtimeChunk: { name: 'runtime' }
}

const config: webpack.Configuration = {
  mode,
  entry,
  output,
  devtool,
  plugins,
  optimization,
  module,
  resolve,
  watch: !production
}

export default config
