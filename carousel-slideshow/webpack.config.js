var path = require("path");
var ExtractTextPlugin = require("extract-text-webpack-plugin");
var OptimizeCssAssetsPlugin = require("optimize-css-assets-webpack-plugin");
var HtmlWebpackPlugin = require("html-webpack-plugin");

module.exports = [
  {
    entry: "./src/index.js",
    output: {
      path: path.resolve(__dirname, "dist"),
      filename: "./mibreit-gallery/mibreitGallery.min.js",
      library: "mibreitGallery",
      libraryTarget: "var",
    },
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /(node_modules)/,
          use: {
            loader: "babel-loader",
            options: {
              presets: ["babel-preset-stage-0"].map(require.resolve),
            },
          },
        },
        {
          test: /\.css$/,
          exclude: /(node_modules)/,
          use: ExtractTextPlugin.extract({
            fallback: "style-loader",
            use: [
              {
                loader: "css-loader",
                options: {
                  url: false,
                },
              },
            ],
          }),
        },
        {
          test: /\.html$/,
          use: ["html-loader"],
        },
        {
          test: /\.(jpg|png)$/,
          use: [
            {
              loader: "file-loader",
              options: {
                name: "[name].[ext]",
                outputPath: "mibreit-gallery/images/",
              },
            },
          ],
        },
        {
          test: /\.svg$/,
          use: 'raw-loader',
        },
      ],
    },
    plugins: [
      new ExtractTextPlugin("./mibreit-gallery/css/mibreitGallery.css"),
      new OptimizeCssAssetsPlugin({
        assetNameRegExp: /\.css$/g,
        cssProcessor: require("cssnano"),
        cssProcessorPluginOptions: {
          preset: [
            "default",
            {
              discardComments: {
                removeAll: true,
              },
            },
          ],
        },
        canPrint: true,
      }),
      new HtmlWebpackPlugin({
        template: "src/index.html",
        inject: false,
      }),
    ],
    externals: {
      jquery: "jQuery",
    },
  },
];
