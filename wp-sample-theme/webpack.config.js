const path = require('path');

// eslint-disable-next-line import/no-extraneous-dependencies
// const TerserPlugin = require('terser-webpack-plugin');

const PRODUCTION= true;

module.exports = {
    mode: PRODUCTION ? 'production' : 'development',
    devtool: PRODUCTION ? false : 'inline-source-map',
    // devtool: 'source-map',
    target: 'web',
    entry: {
        theme: './src/js/index.js',
        theme_block_editor: './src/js/theme-block-editor.js'
    },
    output: {
        filename: '[name].js',
        path: path.resolve(__dirname, './assets/js/build/'),
        publicPath: './assets/js/build/',
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: 'babel-loader',
                options: {
                    presets: ['@babel/preset-env'],
                },
            },
            {
                test: /\.tsx?$/,
                loader: 'ts-loader',
                options: {
                    appendTsSuffixTo: [/\.vue$/],
                },
                exclude: /node_modules/,
            }
        ],
    },
    // optimization: {
    //     minimize: true,
    //     minimizer: [new TerserPlugin({
    //         terserOptions: {
    //             sourceMap: true
    //         }
    //     })],
    // },
    plugins: PRODUCTION ? [
    ] : [
    ]
    // eslint: {
    //     failOnError: true,
    //     failOnWarning: true
    // }
};
