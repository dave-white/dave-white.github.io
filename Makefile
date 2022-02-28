pages_en = index.html research.html teaching.html resources.html cv.html interests.html

pages_fr = fr/accueil.html fr/recherche.html fr/enseigner.html fr/cv.html

shrd_deps = static/head.html side-nav.php

shrd_deps_en = pg-array.php static/lang-ver-anchor.html

shrd_deps_fr = fr/pg-array.php fr/static/lang-ver-anchor.html

.PHONY: all clean

all: $(pages_en) $(pages_fr)

index.html: %.html: %-mn.php $(shrd_deps) $(shrd_deps_en)
	php -f page.php "" "$*" > $@

research.html: %.html: static/%-mn.html $(shrd_deps) $(shrd_deps_en)
	php -f page.php "" "$*" > $@

teaching.html: %.html: %-mn.php $(shrd_deps) $(shrd_deps_en)
	php -f page.php "" "$*" > $@

resources.html: %.html: static/%-mn.html $(shrd_deps) $(shrd_deps_en)
	php -f page.php "" "$*" > $@

cv.html: %.html: %-mn.php $(shrd_deps) $(shrd_deps_en)
	php -f page.php "" "$*" > $@

interests.html: %.html: static/%-mn.html $(shrd_deps) $(shrd_deps_en)
	php -f page.php "" "$*" > $@

fr/accueil.html: fr/%.html: fr/%-mn.php $(shrd_deps) $(shrd_deps_fr)
	php -f page.php "fr/" "$*" > $@;

fr/recherche.html: fr/%.html: fr/static/%-mn.html $(shrd_deps) $(shrd_deps_fr)
	php -f page.php "fr/" "$*" > $@;

fr/enseigner.html: fr/%.html: fr/%-mn.php $(shrd_deps) $(shrd_deps_fr)
	php -f page.php "fr/" "$*" > $@;

fr/cv.html: fr/%.html: fr/static/%-mn.html $(shrd_deps) $(shrd_deps_fr)
	php -f page.php "fr/" "$*" > $@;

clean:
	rm $(pages_en) $(pages_fr)
