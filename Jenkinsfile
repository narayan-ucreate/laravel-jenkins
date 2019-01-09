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
                sh 'docker pull ucreateit/php7.1:v0.1'
                sh 'docker pull composer'
                sh 'docker exec -it laraveljenkins_postgres-test_1 /bin/bash'
                sh 'php --version'
            }
        }
        stage('install database') {
            steps {
             sh 'docker-compose -f docker-compose.yml up -d postgres-test'
            }
        }
    }
}