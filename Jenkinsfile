pipeline {
   agent {  docker { image 'bitnami/laravel'}
               }

   environment {
       APP_VERSION = '1'
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
               echo 'test Done....'
           }
       }
       stage('Deploy') {
           steps {
               echo 'Deploying....'
           }
       }
   }
}
