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
                                 docker { image 'docker/compose' }
                             }
          steps {
             sh 'docker-compose -f docker-compose.yml up postgres-test'
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
