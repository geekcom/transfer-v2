db.createUser({
    user: 'dev',
    pwd: 'example',
    roles: [
        {
            role: 'readWrite',
            db: 'transfer',
        },
    ],
});
