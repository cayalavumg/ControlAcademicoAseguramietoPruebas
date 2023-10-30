pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                // Clonar el repositorio de tu proyecto desde un sistema de control de versiones (por ejemplo, Git)
                checkout scm
            }
        }

        stage('Install Dependencies') {
            steps {
                // Instalar las dependencias de Composer
                sh 'composer install'
            }
        }

        stage('Run Tests') {
            steps {
                // Ejecutar las pruebas PHPUnit
                sh './vendor/bin/phpunit'
            }
        }

    stage('Unit Tests') {
        steps {
            sh 'vendor/bin/phpunit'
            xunit([
                thresholds: [
                    failed ( failureThreshold: "0" ),
                    skipped ( unstableThreshold: "0" )
                ],
                tools: [
                    PHPUnit(pattern: 'build/logs/junit.xml', stopProcessingIfError: true, failIfNotNew: true)
                ]
            ])
            publishHTML([
                allowMissing: false,
                alwaysLinkToLastBuild: false,
                keepAll: false,
                reportDir: 'build/coverage',
                reportFiles: 'index.html',
                reportName: 'Coverage Report (HTML)',
                reportTitles: ''
            ])
            publishCoverage adapters: [coberturaAdapter('build/logs/cobertura.xml')]
        }
    }   

        stage('Deploy') {
            steps {
                // Agregar pasos de implementación (por ejemplo, copiar archivos al servidor)
                // Puedes personalizar esta etapa según tus necesidades
            }
        }
    }

    post {
        success {
            // Notificar por correo electrónico, Slack o realizar otras acciones si el pipeline tiene éxito
        }
        failure {
            // Notificar por correo electrónico, Slack o realizar otras acciones si el pipeline falla
        }
    }
}
