export default class {
    constructor(data) {
        this.components = data.components
        this.dataSource = this.createDataSource(data.dataRanges)
    }
    
    /*
    * dataRanges = [
    *   {start: 10, step: 2.5, count: 20},
    *   {start: 0, step: 1, count: 20}
    * ]
    * */
    createDataSource(dataRanges)
    {
        let i, j, arrResult = []
        for (i = 0; i < dataRanges.length; i++) {
            let { start, count, step } = dataRanges[i];
            let arrData = []

            for (j = start; j < start + count * step; j += step) {
                arrData.push({
                    val: j.toString(),
                    label: j.toString()
                })
            }

            arrResult.push({
                component: i,
                data: arrData
            })
        }

        return arrResult
    }

    getDataSource() {
        return this.dataSource
    }

    getComponents() {
        return this.components
    }
}