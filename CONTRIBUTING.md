# Contributing to ZEDx

We're really excited that you are interested in contributing to ZEDx. Before submitting your contribution, please take a moment and read through the following guidelines.

## Reporting Bugs

- Before opening an issue, debug your problem by following [these instructions](https://zedx.io/docs/master/contributions#bug-reports). Only open an issue if you are confident it is a bug with ZEDx, not with your own setup.

- All issues should be reported on the [zedx/core](https://github.com/zedx/core/issues) repository.

- Try to search for your issue – it may have already been answered or even fixed in the development branch.

- Check if the issue is reproducible with the latest version of ZEDx. If you are using a pre-release or development version, please indicate the specific version you are using.

- It is **required** that you clearly describe the steps necessary to reproduce the issue you are running into. Issues with no clear repro steps will not be triaged. If an issue labeled "needs verification" receives no further input from the issue author for more than 5 days, it will be closed.

### Security Vulnerabilities

If you discover a security vulnerability within ZEDx, please send an email to [security@zedx.io](mailto:security@zedx.io).

## Pull Request Guidelines

- Read the [Contributor License Agreement](#contributor-license-agreement).

- Checkout a topic branch from `develop` and merge back against `develop`.

- [Squash the commits](http://davidwalsh.name/squash-commits-git) if there are too many small ones.

- Follow the [code style](#code-style).

## Code Style

ZEDx follows the [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standard and the [PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md) autoloading standard.

### PHPDoc

Below is an example of a valid ZEDx documentation block. Note that the `@param` attribute is followed by two spaces, the argument type, two more spaces, and finally the variable name:

    /**
     * Register a binding with the container.
     *
     * @param  string|array  $abstract
     * @param  \Closure|string|null  $concrete
     * @param  bool  $shared
     * @return void
     */
    public function bind($abstract, $concrete = null, $shared = false)
    {
        //
    }

### StyleCI

If you're code style isn't perfect, don't worry! [StyleCI](https://styleci.io/) will automatically merge any style fixes into the ZEDx repository after any pull requests are merged. This allows us to focus on the content of the contribution and not the code style.


## Development Setup

[zedx/zedx](https://github.com/zedx/zedx) is a "skeleton" application which uses Composer to download [zedx/core](https://github.com/zedx/core). In order to work on these, you will need to change their versions to `dev-master` in `composer.json` and install them from source:

```bash
$ composer update --prefer-source
```


## Contributor License Agreement

By contributing your code to ZEDx you grant Amine Oudjehih a non-exclusive, irrevocable, worldwide, royalty-free, sublicensable, transferable license under all of Your relevant intellectual property rights (including copyright, patent, and any other rights), to use, copy, prepare derivative works of, distribute and publicly perform and display the Contributions on any licensing terms, including without limitation: (a) open source licenses like the MIT license; and (b) binary, proprietary, or commercial licenses. Except for the licenses granted herein, You reserve all right, title, and interest in and to the Contribution.

You confirm that you are able to grant us these rights. You represent that You are legally entitled to grant the above license. If Your employer has rights to intellectual property that You create, You represent that You have received permission to make the Contributions on behalf of that employer, or that Your employer has waived such rights for the Contributions.

You represent that the Contributions are Your original works of authorship, and to Your knowledge, no other person claims, or has the right to claim, any right in any invention or patent related to the Contributions. You also represent that You are not legally obligated, whether by entering into an agreement or otherwise, in any way that conflicts with the terms of this license.

Amine Oudjehih acknowledges that, except as explicitly described in this Agreement, any Contribution which you provide is on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, WITHOUT LIMITATION, ANY WARRANTIES OR CONDITIONS OF TITLE, NON-INFRINGEMENT, MERCHANTABILITY, OR FITNESS FOR A PARTICULAR PURPOSE.
