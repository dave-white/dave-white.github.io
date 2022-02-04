pages_en = index.html research.html teaching.html cv.html

pages_fr = fr/index.html fr/recherche.html fr/enseigner.html fr/cv.html

shrd_deps = main.php static/head.html

shrd_deps_en = pg-array.php static/lang-ver-anchor.html

shrd_deps_fr = fr/pg-array.php static/fr/lang-ver-anchor.html

.PHONY: all

all: pages_all

pages_all: $(shrd_deps) $(pages_en) $(pages_fr)

$(pages_en): %.html: static/%-main.html $(shrd_deps_en)
	php -f main.php $* > ../$@

$(pages_fr): %.html: static/%-main.html $(shrd_deps_fr)
	php -f main.php $* > ../$@

$(shrd_deps) $(shrd_deps_en) $(shrd_deps_fr):
	touch $@

