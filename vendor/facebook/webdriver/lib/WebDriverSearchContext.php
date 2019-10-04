<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

namespace Facebook\WebDriver;

/**
 * The interface for WebDriver and WebDriverElement which is able to search for
 * WebDriverElement inside.
 */
interface WebDriverSearchContext
{
    /**
     * Find the first WebDriverElement within this element using the given
     * mechanism.
     *
     * @param WebDriverBy $locator
     * @return WebDriverElement NoSuchElementException is thrown in
     *    HttpCommandExecutor if no element is found.
     * @see WebDriverBy
     */
    public function findElement(WebDriverBy $locator);

    /**
     * Find all WebDriverElements within this element using the given mechanism.
     *
     * @param WebDriverBy $locator
     * @return WebDriverElement[] A list of all WebDriverElements, or an empty array if
     *    nothing matches
     * @see WebDriverBy
     */
    public function findElements(WebDriverBy $locator);
}
