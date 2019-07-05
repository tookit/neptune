# image

``` bash
docker pull valeriansaliou/sonic:v1.2.0
```

#config


``` bash
docker run -p 1491:1491 -v /config.cfg:/etc/sonic.cfg -v ./store/:/var/lib/sonic/store/ valeriansaliou/sonic:v1.2.0
```

