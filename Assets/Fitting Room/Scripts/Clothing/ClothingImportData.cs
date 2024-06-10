using System;
using System.Collections.Generic;

namespace Fitting_Room
{
    [Serializable]
    public class ClothingImportData
    {
        public List<ImportInfo> importInfos;
    }

    [Serializable]
    public class ImportInfo
    {
        public string objName;
        public bool isEnable;
        public ClothCategory category;
    }
}