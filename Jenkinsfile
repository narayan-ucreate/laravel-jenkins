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
                sh 'docker run --rm -v $(pwd):/app -w /app --link database karllhughes/php-cli-postgres php index.php'
                sh 'php --version'
            }
        }
        stage('install database') {
            steps {
             sh 'docker run -d --rm --name database -e POSTGRES_USER=postgres -e POSTGRES_PASSWORD=postgres  POSTGRES_DB=test postgres:9.6'
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