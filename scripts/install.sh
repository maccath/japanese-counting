#!/bin/bash

# Import the SSH deployment key
openssl aes-256-cbc -K $encrypted_0e2c24ae3379_key -iv $encrypted_0e2c24ae3379_iv -in deploy-key.enc -out ~\/.ssh/deploy-key -d
rm deploy-key.enc # Don't need it anymore
chmod 600 deploy-key
mv deploy-key ~/.ssh/id_rsa

composer install