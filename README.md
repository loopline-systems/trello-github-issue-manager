# Issue-Manager

Small symfony2 tool to connect Trello and Github.




[![License](https://img.shields.io/packagist/l/loopline-systems/trello-github-issue-manager.svg)](http://opensource.org/licenses/MIT)
[![Build Status](http://img.shields.io/travis/loopline-systems/trello-github-issue-manager.svg)](https://travis-ci.org/loopline-systems/trello-github-issue-manager)
[![Coverage Status](https://img.shields.io/coveralls/loopline-systems/trello-github-issue-manager.svg)](https://coveralls.io/r/loopline-systems/trello-github-issue-manager?branch=master)
[![Code Climate](https://codeclimate.com/github/loopline-systems/trello-github-issue-manager/badges/gpa.svg)](https://codeclimate.com/github/loopline-systems/trello-github-issue-manager)

[![Packagist](http://img.shields.io/packagist/v/loopline-systems/trello-github-issue-manager.svg)](https://packagist.org/packages/loopline-systems/trello-github-issue-manager)
[![Packagist](http://img.shields.io/packagist/dt/loopline-systems/trello-github-issue-manager.svg)](https://packagist.org/packages/loopline-systems/trello-github-issue-manager)
[![Packagist](http://img.shields.io/packagist/dm/loopline-systems/trello-github-issue-manager.svg)](https://packagist.org/packages/loopline-systems/trello-github-issue-manager)
[![Packagist](http://img.shields.io/packagist/dd/loopline-systems/trello-github-issue-manager.svg)](https://packagist.org/packages/loopline-systems/trello-github-issue-manager)


TODO: insert-full-description

TODO: insert-screenshot-or-screencast




# Setup

## GitHub



### Webhook

https://developer.github.com/webhooks/

Event Types & Payloads: https://developer.github.com/v3/activity/events/types/


*Setup steps*

Setup a GitHub webhook call to your server
 
1. Within your GitHub repository, go to settings. 

2. In the left side navigation you'll find "Webhooks & Services".

3. Click "Add Webhook"
   Payload URL: `http(s)://<YOUR_DOMAIN>/github-hook (only accessable via POST)`
   Content type: `application/json`
   Secret: random string, e.g. `ThisIsAReallySafeAndSecretString!!11^!`
   (Depending on your SSL certificate, disable the certificate check)
   
   Make sure you checked "Send me everything"
   
   :information_source: for debugging purposes, there's a second URL: `/github-hook/log`
   
4. Done; You should see a green check mark next to your new hook 


### API

To create an API token, follow those steps:

1. Go to your settings page https://github.com/settings/applications

2. Select "Applications" in the left sidebar

3. "Generate new token"
   Token description: e.g. `issue_manager`
   Select scopes: check at least `repo` or `public_repo` (depending on your repository type you want to link)

4. Click "Generate token" and copy it to out parameters.yml
   > !! Make sure to copy your new personal access token now. You won't be able to see it again!




## Trello

### Webhook

Before we can create a Webhook, we need an `APPLICATION_KEY` and a `UserToken`. Also we need to fetch the `idModel` of the board.



#### ApplicationKey 

Generate an `APPLICATION_KEY`: https://trello.com/1/appkey/generate


#### UserToken:


To generate a *read & write* access token, open this URL in thw browser while being logged into your Trello account:
`https://trello.com/1/authorize?key=<APPLICATION_KEY>&name=Issue+Manager&expiration=never&response_type=token&scope=read,write`

You will receive a UserToken, save it.




##### get board information via API

Get the `TRELLO_BOARD_SHORT_ID` from the board URL

`GET https://api.trello.com/1/board/<TRELLO_BOARD_SHORT_ID>?key=<APPLICATION_KEY>&token=<UserToken>`

Will return a json, including `id`.

sample return JSON:
```
{"id":"26ca7070043c7581962930bb","name":"Development Features","desc":"","descData":null,"closed":false,"idOrganization":null,"pinned":false,"url":"https://trello.com/b/aQnT0luF/development-features","shortUrl":"https://trello.com/b/aQnT0luF","prefs":{"permissionLevel":"public","voting":"disabled","comments":"members","invitations":"members","selfJoin":false,"cardCovers":true,"cardAging":"regular","calendarFeedEnabled":false,"background":"grey","backgroundColor":"#808080","backgroundImage":null,"backgroundImageScaled":null,"backgroundTile":false,"backgroundBrightness":"unknown","canBePublic":true,"canBeOrg":true,"canBePrivate":true,"canInvite":true},"labelNames":{"green":"","yellow":"","orange":"","red":"","purple":"","blue":"","sky":"","lime":"","pink":"","black":""}}
```

Now we got the `id` aka `idModel` of the board.


#### Creating the Webhook

Official setup documentation: https://trello.com/docs/gettingstarted/webhooks.html



Or follow those steps:


Before we can create a Webhook for a board, we need to get the `idModel` for the board.
Also, the webhook call URL on our side must be up and running (returning 200 OK on a HEAD request).


`POST https://api.trello.com/1/tokens/<UserToken>/webhooks/?key=<APPLICATION_KEY>` [application/json]
```
{
  "description": "Issue Manager Webhook Logger",
  "callbackURL": "https://<YOUR_DOMAIN>/trello-hook",
  "idModel": "26ca7070043c7581962930bb"
}
```
With `idModel` being the id of the board.

Using curl:
```
curl 'https://api.trello.com/1/tokens/<UserToken>/webhooks/?key=<APPLICATION_KEY>' -H 'Content-Type: application/json' -H 'Accept: application/json' --data-binary $'{\n  "description": "Issue Manager Webhook",\n  "callbackURL": "https://issue-manager-demo.loopline-systems.com/trello-hook",\n  "idModel": "26ca7070043c7581962930bb"\n}' --compressed
```


Return from Trello:
```
{
    "id": "52cbfbb1aa3ecf483b7edc5b",
    "description": "Issue Manager Webhook Logger",
    "idModel": "26ca7070043c7581962930bb",
    "callbackURL": "https://<YOUR_DOMAIN>/trello-hook",
    "active": true
}
```
Save the `idModel` of the webhook! (will never be shown again)


Phew, we're done! Check your access logs, if the call worked.


