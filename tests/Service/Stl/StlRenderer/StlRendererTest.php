<?php

namespace Tests\AppBundle\Service\Stl;

use AppBundle\Service\Stl\StlConverterService;
use AppBundle\Service\Stl\StlFixerService;
use AppBundle\Service\Stl\StlRendererService;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemInterface;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStreamWrapper;
use PHPUnit\Framework\TestCase;
use Tests\AppBundle\BaseTest;

class StlRendererTest extends BaseTest
{
    /** @var StlRendererService */
    protected $stlRenderer;

    public function setUp()
    {
        $layout = $this->get('kernel')->getRootDir().'/Resources/povray_layout/layout.tmpl';
        $povray = $this->getParameter('povray_bin');
        $stl2pov = $this->getParameter('stl2pov_bin');

       $this->stlRenderer = new StlRendererService($layout,$povray,$stl2pov);
    }

    public function tearDown()
    {
        $this->filesystem->delete('973c00.png');
    }

    public function testRendering()
    {
        $this->stlRenderer->render(__DIR__.'/fixtures/973c00.stl',$this->filesystem->getAdapter()->getPathPrefix());
        $this->assertTrue($this->filesystem->has('973c00.png'));
    }
}