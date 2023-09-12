const VueLoader = require('vue-loader');
const path = require('path');

module.exports = {
    mode: 'development',
    entry: './resources/js/app.js',  // Главный файл вашего приложения
    module: {
        rules: [
            // {
            //     test: /\.vue$/,
            //     loader: 'vue-loader'
            // },
            {
                test: /\.js$/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                },
                exclude: /node_modules/
            },
            {
                test: /\.css$/,
                use: [
                    'vue-style-loader',
                    'css-loader'
                ]
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                options: {
                    loaders: {
                        scss: 'vue-style-loader!css-loader!sass-loader', // <style lang="scss">
                        sass: 'vue-style-loader!css-loader!sass-loader?indentedSyntax' // <style lang="sass">
                    }
                }
            },
            {
                test: /\.scss$/,
                use: [
                    'vue-style-loader',
                    'css-loader',
                    'sass-loader'
                ]
            },
            // {
            //     test: /\.sass$/,
            //     use: [
            //         'vue-style-loader',
            //         'css-loader',
            //         {
            //             loader: 'sass-loader',
            //             // Вы можете использовать `sass` вместо `node-sass`
            //             // в зависимости от того, какой пакет вы установили ранее
            //             options: { implementation: require('sass'), sassOptions: { indentedSyntax: true } }
            //         }
            //     ]
            // }
        ]
    },
    plugins: [
        new VueLoader.VueLoaderPlugin()
    ],
    resolve: {
        extensions: ['.js', '.vue'],
        alias: {
            '@': __dirname + '/resources/js'
        },
    },
    output: {
        filename: 'app.js',
        path: path.resolve(__dirname, 'public/dist')
    }
};