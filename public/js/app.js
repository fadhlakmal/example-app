const image = document.getElementById('uploaded_image');
let resize = false;
let rotate = false;
let editing = false;
let direction = '';
let rotation = 0;

if (image) {
    let offsetX, offsetY, startWidth, startHeight, startX, startY;

    image.addEventListener('dragstart', function (event) {
        if (!resize && !rotate) {
            const rect = image.getBoundingClientRect();
            offsetX = event.clientX - rect.left;
            offsetY = event.clientY - rect.top;
            console.log('Drag started at:', event.clientX, event.clientY);
        }
    });

    image.addEventListener('mousemove', function (event) {
        const rect = image.getBoundingClientRect();
        const currX = event.clientX;
        const currY = event.clientY;
        const threshold = 10;
        if (!editing) {
            if ((currX >= rect.left && currX <= rect.left + threshold && currY >= rect.top && currY <= rect.top + threshold) ||
                (currX >= rect.right - threshold && currX <= rect.right && currY >= rect.top && currY <= rect.top + threshold) ||
                (currX >= rect.left && currX <= rect.left + threshold && currY >= rect.bottom - threshold && currY <= rect.bottom) ||
                (currX >= rect.right - threshold && currX <= rect.right && currY >= rect.bottom - threshold && currY <= rect.bottom)) {
                image.style.cursor = 'pointer';
                direction = 'corner';
            } else if (currX >= rect.left && currX <= rect.left + threshold) {
                image.style.cursor = 'ew-resize';
                direction = 'left';
            } else if (currX >= rect.right - threshold && currX <= rect.right) {
                image.style.cursor = 'ew-resize';
                direction = 'right';
            } else if (currY >= rect.top && currY <= rect.top + threshold) {
                image.style.cursor = 'ns-resize';
                direction = 'top';
            } else if (currY >= rect.bottom - threshold && currY <= rect.bottom) {
                image.style.cursor = 'ns-resize';
                direction = 'bottom';
            } else {
                image.style.cursor = 'grab';
                direction = '';
            }
        }

        console.log('Mouse at:', event.clientX, event.clientY);
    });

    image.addEventListener('mousedown', function (event) {
        editing = true;
        if (direction === 'corner') {
            rotate = true;
            startX = event.clientX;
            startY = event.clientY;
            event.preventDefault();
        } else if (direction !== '') {
            resize = true;
            startX = event.clientX;
            startY = event.clientY;
            startWidth = parseInt(window.getComputedStyle(image).width, 10);
            startHeight = parseInt(window.getComputedStyle(image).height, 10);
            event.preventDefault();
        }
    });

    document.addEventListener('dragover', function (event) {
        event.preventDefault();
    });

    document.addEventListener('drop', function (event) {
        if (!resize && !rotate) {
            event.preventDefault();

            const xPos = event.clientX - offsetX;
            const yPos = event.clientY - offsetY;

            image.style.left = `${xPos}px`;
            image.style.top = `${yPos}px`;

            console.log('Image dropped at:', xPos, yPos);
        }
        editing = false;
    });

    document.addEventListener('mousemove', function (event) {
        if (resize) {
            const dx = event.clientX - startX;
            const dy = event.clientY - startY;

            if (direction === 'left') {
                image.style.width = `${startWidth - dx}px`;
            } else if (direction === 'right') {
                image.style.width = `${startWidth + dx}px`;
            } else if (direction === 'top') {
                image.style.height = `${startHeight - dy}px`;
            } else if (direction === 'bottom') {
                image.style.height = `${startHeight + dy}px`;
            }
        } else if (rotate) {
            const dx = event.clientX - startX;
            rotation += dx * 0.5;
            image.style.transform = `rotate(${rotation}deg)`;
            startX = event.clientX;
        }
    });

    document.addEventListener('mouseup', function () {
        resize = false;
        rotate = false;
        editing = false;
    });
}
