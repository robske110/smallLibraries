# smallLibraries

This repo contains some small Libraries for PM plugin makers

### EasyChunkLoader

Keeping chunks loaded has never been easier:
```php
$this->chunkLoaderForMyImportantChunk = new EasyChunkLoader($vec3, $level);
```
If you want to __temporarily__ disable the ChunkLoader call:
```php
$this->chunkLoaderForMyImportantChunk->deactivate();
```
If you want to enable it again call:
```php
$this->chunkLoaderForMyImportantChunk->activate();
```

#### *IMPORTANT* If you want to no longer use this ChunkLoader always do:
```php
$this->chunkLoaderForMyImportantChunk->unregister();
$this->chunkLoaderForMyImportantChunk = null;
```
In order to free all memory, because you don't want to be the plugin author that creates Memory leakes do you?

### More libaries to come...
