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
        stage('install php') {
            steps {
                sh 'docker-compose -f docker-compose.yml up -d php-install'
                sh 'php --version'
            }
        }
        stage('install database') {
            steps {
             sh 'docker-compose -f docker-compose.yml up -d postgres-test'
            }
        }
        stage('install composer') {
            agent {
                docker { image 'composer' }
            }
            steps {
             sh "php -r \"copy('.env.example', '.env');\""
             sh 'php --version'
             sh 'composer --version'
             sh 'composer install'
             sh 'php artisan key:generate'
             sh 'php artisan migrate'
             sh './vendor/phpunit/phpunit/phpunit'
            }
        }
    }
}