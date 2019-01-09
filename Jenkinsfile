pipeline {
    agent any
    environment {
        REDIS_HOST='localhost'
        DB_CONNECTION='pgsql'
        DB_HOST='localhost'
        DB_PORT='5432'
        DB_DATABASE='postgres'
        DB_USERNAME='postgres'
        DB_PASSWORD='secret'
    }
    stages {
        stage('install database') {
            steps {
             sh 'docker-compose -f docker-compose.yml up -d'
             sh 'docker run -it -d laraveljenkins_laravel_1 ./vendor/phpunit/phpunit/phpunit'
            }
        }
    }
}