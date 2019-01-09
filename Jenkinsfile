pipeline {
   agent {
       docker { image 'bitnami/laravel'}
   }
   environment {
       APP_VERSION = '1'
       APP_KEY='base64:6sdkkH477UqH1nAGPpqfCjZemJoafRCAMpJDtbGeems='
   }
   stages {
       stage('Build') {
           steps {
              sh 'php --version'
              sh 'composer install'
           }
       }
       stage('Test') {
           steps {
              sh "php -r \"copy('.env.example', '.env');\""
              sh './vendor/phpunit/phpunit/phpunit'
           }
       }
       stage('Deploy') {
           steps {
              echo 'Deploying....'
           }
       }
   }
}
