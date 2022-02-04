# dave-white.github.io

My personal website, mostly for presenting myself in a professional capacity. It is still under construction, and eventually to be fully available in both English and French.

## License

I put this under the Creative Commons license probably for no other reason than that it made a GitHub progress bar for the repo advance a bit (the same reason I've written this README). I don't see how anything here could be of use to anyone, and I don't care what anyone does with it.

## Code

The webpages (i.e. principal `html` files and any accompanying static files) are at the root of the site or, in the case of French-language versions, at `/fr`. See below for the rest.

### Source

Here I've used `php` in effect as a build utility, being that the whole site is, in the end, completely static by necessity. The script `main.php` builds one of the main `html` files per run out of several component `html` and `php` files; the `Makefile` uses it to build the whole site's worth of webpages. All of this found under `/src`.

This way of doing things is just an exercise in minimizing the amount of `html` written---or maximizing its reuse, depending on your point of view. It's certainly unnecessary and arguably more trouble than it's worth, but it gives me something to tinker with.
