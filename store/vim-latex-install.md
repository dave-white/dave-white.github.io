# `vim-latex` scripted installation guide

This document describes the usage of an installation script authored by me 
for the purpose of downloading and installing everything necessary to start 
editing LaTeX in `vim` with the `vim-latex` plugin. Please read the guide 
in its entirety so that you'll know what you need at the outset and what 
you'll be getting.

## Contents
[Dependencies](#dependencies)\
|--[(Mac)Vim](#macvim)\
|--[For the installation script](#for-the-installation-script)\
[Running the installation script](#running-the-installation-script)\
|--[Installing macvim](#installing-macvim)\
[Results](#results)

## Dependencies

### (Mac)Vim

It's not _strictly_ necessary to install MacVim, as MacOS provides the 
terminal application `vim`. This, however, will be somewhat behind the 
latest version and lacking in some features. Plus, most users will likely 
wish to work in the GUI application, `gvim`, which is provided by MacVim 
along with a better maintained version of `vim` for terminal.

There are two ways in which to get MacVim:

1. Through Homebrew by running
       
       brew install --cask macvim

2. By downloading the [official 
   installer](https://macvim-dev.github.io/macvim/).
   
Option (2) has a couple disadvantages:

-  The command line aliases (`vim` for MacVim's terminal app, plus `gvim` 
   and `mvim` for MacVim's GUI app) will have to be put on the user's 
   `PATH` manually; one won't be able to use these commands in, say, 
   `Terminal` out of the box.

-  MacVim can't updated along with the rest of the Homebrew packages via
       
       brew upgrade

The installation script provides a command to install MacVim through 
Homebrew, installing Homebrew itself if it's not already on the system.  
See section ["Installing macvim"](#installing-macvim) below.

### For the installation script

The installation script requires the programs `make` and `git`.  To check 
whether you have these installed, open `Terminal` and run

    which <program>

If the the output is `<program> not found`, then it is not installed, and 
you should have at least the following two options:

1. **Xcode:** Install "Xcode" (a free utility) from the Apple App Store.  
   This provides both `make` and `git`.

2. **Homebrew**: This is a software package manager for MacOS. Install it 
   by running
       
       /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"

   in `Terminal`. Then to get `<program>` (in this case `make` or `git`), 
   run

       brew install <program>

## Running the installation script

The script is hosted on my website 
[here](https://dave-white.github.io/resources/Makefile-vim-latex). You can 
download it, `cd` to its location in `Terminal`, and then run `make -f 
Makefile-vim-latex`, or else just paste the following into a `Terminal` 
prompt and hit enter:

    mkdir -p ~/Downloads && \
    curl -LSso ~/Downloads/Makefile-vim-latex https://dave-white.github.io/resources/Makefile-vim-latex && \
    make -f ~/Downloads/Makefile-vim-latex

### Installing macvim

To use the script to install MacVim using Homebrew, run the following in 
addition:
    
    make -f ~/Downloads/Makefile-vim-latex macvim

## Results

In addition to installing the `vim-latex` plugin, the script installs a 
couple others:

-  `vim-pathogen` : This loads the `vim-latex` plugin in `vim` whenever a 
   `.tex` file is opened. It is required for `vim-latex` to work 
   out-of-the-box.

-  `vim-sensible` : Bundles together a number of widely-agreed-upon default 
   settings for `vim`. Not required, but probably good to have.

It also installs the `molokai` color scheme (because this is what I use, 
and I think it's pretty good for LaTeX syntax highlighting). There are many 
other color schemes available&mdash;some packaged with `vim`, others made 
by other users which you have to go hunting for on the internet.

Finally, the script creates and populates the file `~/.vim/vimrc`, which is 
where a user's personal global settings for `vim` go. For this I've used a 
slightly trimmed down version of my own `vimrc` file, trying to retain what 
I think most people will find intuitive or unobtrusive and to jettison 
things which are peculiar to my taste and might strike others as 
bothersome.

An inexhaustive tree of the local files created:

    ~/.vim/
    |
    |___autoload/
    |   |
    |   |___pathgen.vim
    |
    |___bundle/
    |   |
    |   |___vim-latex/
    |   |
    |   |___vim-sensible/
    |
    |___colors/
    |   |
    |   |___molokai.vim
    |
    |___ftplugin/
    |   |
    |   |___tex/
    |       |
    |       |___texrc
    |
    |___vimrc

