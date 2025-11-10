#!/bin/bash

# SSL setup script for Rhymix
echo "Setting up SSL for Rhymix..."

# Create SSL directory if it doesn't exist
mkdir -p ./rhymix/ssl

# Generate self-signed certificate for development
if [ ! -f "./rhymix/ssl/localhost.crt" ]; then
    echo "Generating self-signed SSL certificate for localhost..."
    openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
        -keyout ./rhymix/ssl/localhost.key \
        -out ./rhymix/ssl/localhost.crt \
        -subj "/C=KR/ST=Seoul/L=Seoul/O=Development/CN=localhost"
    echo "Self-signed certificate created!"
fi

# Set correct permissions
chmod 600 ./rhymix/ssl/localhost.key
chmod 644 ./rhymix/ssl/localhost.crt

echo "SSL setup completed!"
echo ""
echo "For production, replace the self-signed certificate with:"
echo "1. Let's Encrypt certificate (automatic with acme-companion)"
echo "2. Commercial SSL certificate"
echo ""
echo "To use Let's Encrypt, update docker-compose.yml with your domain:"
echo "  - VIRTUAL_HOST=your-domain.com"
echo "  - LETSENCRYPT_HOST=your-domain.com"
echo "  - LETSENCRYPT_EMAIL=your-email@domain.com"