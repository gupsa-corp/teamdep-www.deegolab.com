#!/bin/bash

# Environment variables validation script
# This script checks if all required environment variables are set

echo "🔍 Checking required environment variables..."

# Load .env file if exists
if [ -f .env ]; then
    echo "✅ Found .env file"
    source .env
else
    echo "❌ .env file not found!"
    echo "📝 Please copy .env.example to .env and configure it:"
    echo "   cp .env.example .env"
    exit 1
fi

# Required environment variables
REQUIRED_VARS=(
    "DB_ROOT_PASSWORD"
    "DB_DATABASE"
    "DB_USER"
    "DB_PASSWORD"
    "DB_HOST"
    "DB_PORT"
    "RHYMIX_CONTAINER_NAME"
    "DB_CONTAINER_NAME"
    "RHYMIX_HTTP_PORT"
    "RHYMIX_HTTPS_PORT"
    "DB_PORT_EXTERNAL"
    "SSL_DOMAIN"
    "SSL_EMAIL"
    "RHYMIX_SRC_PATH"
    "NGINX_CONFIG_PATH"
    "SSL_CERTS_PATH"
    "LOGS_PATH"
)

# Check each required variable
MISSING_VARS=()
for var in "${REQUIRED_VARS[@]}"; do
    if [ -z "${!var}" ]; then
        MISSING_VARS+=("$var")
    fi
done

# Report results
if [ ${#MISSING_VARS[@]} -eq 0 ]; then
    echo "✅ All required environment variables are set!"
    echo ""
    echo "🗄️  Database Configuration:"
    echo "   Host: ${DB_HOST}"
    echo "   Database: ${DB_DATABASE}"
    echo "   User: ${DB_USER}"
    echo "   External Port: ${DB_PORT_EXTERNAL}"
    echo ""
    echo "🌐 Rhymix Configuration:"
    echo "   HTTP Port: ${RHYMIX_HTTP_PORT}"
    echo "   HTTPS Port: ${RHYMIX_HTTPS_PORT}"
    echo "   Domain: ${SSL_DOMAIN}"
    echo ""
    exit 0
else
    echo "❌ Missing required environment variables:"
    for var in "${MISSING_VARS[@]}"; do
        echo "   - $var"
    done
    echo ""
    echo "📝 Please set these variables in your .env file"
    echo "💡 Check .env.example for reference values"
    exit 1
fi