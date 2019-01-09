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
            agent {
                docker { image 'docker run -v $(pwd):/app -w /app --link database karllhughes/php-cli-postgres php index.php' }
            }
            steps {
                sh 'php --version'
            }
        }
        stage('install database') {
            steps {
             sh 'docker run -d --name database -e POSTGRES_USER=postgres -e POSTGRES_PASSWORD=postgres  POSTGRES_DB=test postgres:9.6'
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