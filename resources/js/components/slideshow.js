export default () => ({
    positions: [0, 1, 2, 3],
    totalImages: 8,
    isHovered: false,
    slideInterval: null,

    init() {
        this.startAutoRotation();
    },

    rotateRight() {
        this.positions = this.positions.map(
            (pos) => (pos + 1) % this.totalImages
        );
    },

    rotateLeft() {
        this.positions = this.positions.map(
            (pos) => (pos - 1 + this.totalImages) % this.totalImages
        );
    },

    handleMouseEnter() {
        this.isHovered = true;
        if (this.slideInterval) {
            clearInterval(this.slideInterval);
        }
    },

    handleMouseLeave() {
        this.isHovered = false;
        this.startAutoRotation();
    },

    startAutoRotation() {
        if (!this.isHovered) {
            this.slideInterval = setInterval(() => this.rotateRight(), 20000);
        }
    },
});
