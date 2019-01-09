pipeline {
   agent {
       docker { image 'bitnami/laravel'}
   }
   environment {
       APP_VERSION = '1'
       DB_DATABASE='test'
       DB_USERNAME='postgres'
       DB_PASSWORD='postgres'
   }
   stages {
       stage('Build') {
           steps {
              sh 'php --version'
              sh 'composer install'
           }
       }
       stage('postgress install') {
          agent {
            docker {
               args 'POSTGRES_PASSWORD:postgres POSTGRES_DB: test'
               image 'postgres:10.3-alpine'
             }
          }
          steps {
             echo 'install postgress'
          }
      }
       stage('Test') {
           steps {
              sh "php -r \"copy('.env.example', '.env');\""
              sh 'php artisan key:generate'
              sh 'php artisan migrate'
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
