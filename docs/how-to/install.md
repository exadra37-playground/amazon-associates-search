# HOW TO INSTALL

The bash script `dev` on the route of the project will be used to deploy and manage our development environment, by
using Docker under the hood.

You will need also your secrets from Amazon.


## Development Environment

The Docker Container will use the last available Ubuntu with the last Php 7 and Apache 2.4 versions.

After Docker Container is running we can access the App in `http://localhost:8000`.

##### The bash script `dev`, in the route of the package, will support the following commands:

* [build](#build-docker-image)
* [run](#run-docker-container)
* [deploy](#deploy-docker-container)
* [shell](#access-shell-in-docker-container)
* [stop](#stop-docker-container)
* [start](#start-docker-container)
* [remove](#remove-docker-container)
* [destroy](#destroy-docker-container)
* [purge](#purge-docker-image-and-container)
* [secrets](#how-to-setup-secrets)

**TIP**: The fast way to get you ready is to use `deploy` command.


### Build Docker Image

Before we can run a Docker Container we need to build is Docker Image.

```bash
./dev build
```

**TIP**: To build and run a Docker Container in 1 go just use command `deploy`.

### Run Docker Container

To run this command we must have already build a Docker Image.

```bash
./dev run
```

**TIP**: To build and run a Docker Container in 1 go just use command `deploy`.


### Deploy Docker Container

We can deploy the Docker Container by combine `build` and `run` commands in 1 command.

```bash
./dev deploy
```

### Access Shell In Docker Container

After we have used `deploy`, `run` or `start` command we can go inside the Docker Container, like we do with SSH.

```bash
./dev shell
```

### Stop Docker Container

After we use `deploy` or `run` command we can use `stop` command to terminate the Docker Container.

```bash
./dev stop
```

**TIP:** To stop and remove a Docker Image and Container in 1 go, use command `destroy`.


### Start Docker Container

This command should only be used to start a Docker Container previously stopped with command `stop`.

```bash
./dev start
```

### Remove Docker Container

After we use the `stop` command we can permanently remove the Docker Container.

```bash
./dev remove
```

**TIP:** To stop and remove a Docker Image and Container in 1 go, use command `destroy`.


### Destroy Docker Container

When the Docker Container is not needed any more, we can permanently remove it in 1 go, by combine `stop` and `remove` command in 1 single command.

```bash
./dev destroy
```

### Purge Docker Image and Container

When we don't need any more our Docker Image and Container or want to build it again from scratch.

```bash
./dev purge
```


### How To Setup Secrets

We need some secrets to be able to use the Amazon Associates Search Api.

#### To setup them you need:

* Amazon Associate Tag.
* AWS Access Key.
* AWS Secret Key.

After you have them you need to put them in a `.secretes.php` file. You can use the `.secrets-example.php` file and copy it to other location in the host, fill it with the Amazon secrets and create a symlink to it in the root of the project.

To simplify things use the `secrets` command.

```bash
./dev secrets
```

Now edit `/home/$USER/.secrets.php` and just fill it with your secrets.

```php
<?php

return [
    'AWS_ACCESS_KEY'       => 'access-key-here',
    'AWS_SECRET_KEY'       => 'secret-key-here',
    'AMAZON_ASSOCIATE_TAG' => 'associated-tag-here',
];
```
