export interface IBook {
    id?: number;
    title?: string;
    author?: string;
    description?: string;
    price?: number;
    image_path?: string;
    stock?: number;
}

export class Book implements IBook {
    constructor(
        public id?: number,
        public title?: string,
        public author?: string,
        public description?: string,
        public price?: number,
        public image_path?: string,
        public stock?: number
    ) {}
}