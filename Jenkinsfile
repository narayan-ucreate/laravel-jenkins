pipeline {
    agent any
    environment {
        REDIS_HOST='localhost'
        DB_CONNECTION='pgsql'
        DB_HOST='postgres-test'
        DB_PORT='5432'
        DB_DATABASE='postgres'
        DB_USERNAME='postgres'
        DB_PASSWORD='postgres'
    }
    stages {
        stage('install php') {
            agent {
                docker { image 'ucreateit/php7.2:v0.1' }
            }
            steps {
                sh 'php --version'
            }
        }
        stage('install database') {
            steps {
             sh 'docker-compose -f docker-compose.yml up -d postgres-test'
             sh 'docker-compose -f docker-compose.yml up -d pgadmin'
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
             sh './vendor/phpunit/phpunit/phpunit'
            }
        }
    }
}
