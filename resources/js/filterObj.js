const filterObj = {
    _title: undefined,
    _filterCount: 0
}
Object.defineProperty(filterObj, "title", {
    enumerable: true,
    get(){
        return this._title;
    },
    set(newVal) {
        if(newVal === ''){
            this._title = undefined;
            this._filterCount--;
        } else {
            if(this._title === undefined){
                this._filterCount++;
            }
            this._title = newVal.toLowerCase();
        }
    }
});
Object.defineProperty(filterObj, "filterCount", {
    enumerable: true,
    get(){
        return this._filterCount;
    },
    set(newVal) {
        
        this._filterCount = newVal;
    }
});
export default filterObj;