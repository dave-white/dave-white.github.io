boiler	= head.html
pages	= index.html research.html teaching.html cv.html

all: index.html research.html teaching.html cv.html

$(pages): %.html: %.main.html %.nav.html $(boiler) 
	echo '<!DOCTYPE html>' > $@
	echo '<html lang="en">' >> $@
	cat head.html >> $@
	echo '<body>' >> $@
	cat $*.nav.html >> $@
	cat $< >> $@
	echo '</body>' >> $@
	echo '</html>' >> $@
