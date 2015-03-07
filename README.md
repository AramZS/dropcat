# Dropcat

Dropcat is a small single-page app built using AngularJS, Foundation and pulling data from a WordPress WP-API site running the plugin PressForward. 

The site allows any user to search through the topics aggregated into the subject site http://chronoto.pe, select a topic that interests them and, if available, select a subtopic. It will then show a responsive, mobile-ready, grid of all the stories on Chronoto.pe that fall under that topic. 

The grid refreshes in real time! If you find a topic that interests you, just leave the browser window open and it will refresh with all the latest stories that come in under that topic. 

## About

This project is currently in its test phase and is being built by me, Aram Zucker-Scharff. 

# Built on top of the Foundation Compass Template

The easiest way to get started with Foundation + Compass.

## Requirements

  * Ruby 1.9+
  * [Node.js](http://nodejs.org)
  * [compass](http://compass-style.org/): `gem install compass`
  * [bower](http://bower.io): `npm install bower -g`

## Quickstart

  * [Download this starter compass project and unzip it](https://github.com/zurb/foundation-compass-template/archive/master.zip)
  * Run `bower install` to install the latest version of Foundation
  
Then when you're working on your project, just run the following command:

```bash
bundle exec compass watch
```

## Upgrading

If you'd like to upgrade to a newer version of Foundation down the road just run:

```bash
bower update
```
