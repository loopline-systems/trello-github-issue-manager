# Issue-Manager

[![License](https://img.shields.io/packagist/l/loopline-systems/trello-github-issue-manager.svg)](http://opensource.org/licenses/MIT)

[![Packagist](http://img.shields.io/packagist/v/loopline-systems/trello-github-issue-manager.svg)](https://packagist.org/packages/loopline-systems/trello-github-issue-manager)
[![Packagist](http://img.shields.io/packagist/dt/loopline-systems/trello-github-issue-manager.svg)](https://packagist.org/packages/loopline-systems/trello-github-issue-manager)
[![Packagist](http://img.shields.io/packagist/dm/loopline-systems/trello-github-issue-manager.svg)](https://packagist.org/packages/loopline-systems/trello-github-issue-manager)
[![Packagist](http://img.shields.io/packagist/dd/loopline-systems/trello-github-issue-manager.svg)](https://packagist.org/packages/loopline-systems/trello-github-issue-manager)




## Description

Small symfony2 tool to connect Trello and Github.

This tool will allow you to connect your **feature based Trello card** with **several Github issues** across several repositories. This way the product manager can get an easy overview of all the features, while allowing the developers to work within their Github scope, based on normal issues.
 
One example of this setup might be, you have several components and a new feature might affect a set of them. 


### usage flow

1. Create feature card on Trello

2. Create issues within the affected GitHub repositories (using TrelloID in title)
   The tool will create a checklist on Trello card, having an item per issue


3. Bi-directional binding of checklist and GitHub issues
   Whenever an issue is closed/re-opened, the checklist item will represent the state aswell.
   And vice versa, when the checklist item is toggled, the issue gets closed/re-opened.  


4. Comment forwarding
   Using a prefix, comments can be forwarded both ways:

   
  **Github -> Trello**
  
  Using `[trello]` as a prefix the comment will be added to the Trello card comments. 


  **Trello -> Github**
  
  Forwarding comments this direction can be done on several levels, depending on the prefix:
  
  * `[all]`: forward the comment to all attached issues (e.g. when you're not sure which issue the comment affects)
  
  * `[<repoName>]`: forward comment to all issues within this repository
  
  * `[<repoName>/#123]`: forward this comment to a specific issue only



## Live Demo

Trello board: https://trello.com/b/aQnT0luF/development-features

Github issues: https://github.com/issuemanager



## Status

The current implementation is very basic. For details, see the [status overview](docs/status.md).


## Requirements

This Symfony2 tool requires PHP 5.4 or above. 

No database needed. 


## Setup

Please see the [Setup page](docs/setup.md) for further instructions.


## License

[MIT](LICENSE)
