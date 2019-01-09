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
          steps {
            sh 'docker run --name postgres1 -v /tmp/pgdata:/var/lib/postgresql/data -e POSTGRES_PASSWORD=postgres -d postgres'
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
