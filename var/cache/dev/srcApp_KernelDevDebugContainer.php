<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerOWKCRFP\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerOWKCRFP/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerOWKCRFP.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerOWKCRFP\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerOWKCRFP\srcApp_KernelDevDebugContainer(array(
    'container.build_hash' => 'OWKCRFP',
    'container.build_id' => 'ed8c348d',
    'container.build_time' => 1544003948,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerOWKCRFP');
