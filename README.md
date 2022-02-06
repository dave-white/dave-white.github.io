# dave-white.github.io

My personal website, mostly for presenting myself in a professional capacity. It is still under construction, and eventually to be fully available in both English and French.

## License

I put this under the Creative Commons license probably for no other reason than that it made a GitHub progress bar for the repo advance a bit (the same reason I've written this README). I don't see how anything here could be of use to anyone, and I don't care what anyone does with it.

## Code

There is a `.php` file for each webpage of the site. For the English 
version, these are:
1. `index.php`,
2. `research.php`,
3. `teaching.php`,
4. `cv.php`.

There are corresponding pages for the French version.

Since GitHub Pages (github.io) will only utilize static `html`, I've used `make` to build those static files via the `php`.

The `php` can be used directly by, for example, cloning the repo into `dir`, running `php -S localhost:8000 dir router.php`, and then navigating to `localhost:8000` in the browser. It's that last file, `router.php` that handles all the HTTP requests.

