<?php

namespace Ssch\Typo3Encore\Tests\Unit\ViewHelpers;

TYPO3\TestingFramework\Fluid\Unit\ViewHelpers\ViewHelperBaseTestcase

use Ssch\Typo3Encore\Asset\TagRendererInterface;
use Ssch\Typo3Encore\ViewHelpers\RenderWebpackLinkTagsViewHelper;
use TYPO3\TestingFramework\Fluid\Unit\ViewHelpers\ViewHelperBaseTestcase;

/**
 * @covers \Ssch\Typo3Encore\ViewHelpers\RenderWebpackLinkTagsViewHelper
 */
final class RenderWebpackLinkTagsViewHelperTest extends ViewHelperBaseTestcase
{
    /**
     * @var MockObject|RenderWebpackLinkTagsViewHelper
     */
    protected $viewHelper;

    /**
     * @var TagRendererInterface
     */
    protected $tagRenderer;

    protected function setUp(): void
    {
        parent::setUp();
        $this->tagRenderer = $this->getMockBuilder(TagRendererInterface::class)->getMock();
        $this->viewHelper = new RenderWebpackLinkTagsViewHelper($this->tagRenderer);
    }

    /**
     * @test
     */
    public function render(): void
    {
        $this->setArgumentsUnderTest($this->viewHelper, ['entryName' => 'app', 'media' => 'all', 'buildName' => '_default', 'parameters' => [], 'registerFile' => true]);
        $this->tagRenderer->expects($this->once())->method('renderWebpackLinkTags')->with('app', 'all', '_default', null, []);
        $this->viewHelper->initializeArgumentsAndRender();
    }
}
